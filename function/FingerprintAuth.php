<?php
class FingerprintAuth {
    public function register() {
        header('Content-Type: application/json');
        session_start();

        // Generate a challenge and store it in the session
        $challenge = bin2hex(random_bytes(32));
        $_SESSION['challenge'] = $challenge;

        // Return WebAuthn registration options
        return json_encode([
            'publicKey' => [
                'challenge' => $challenge,
                'rp' => ['name' => 'My App'],
                'user' => [
                    'id' => base64_encode(session_id()), // Using session ID as a temporary user identifier
                    'name' => 'User',
                    'displayName' => 'User'
                ],
                'pubKeyCredParams' => [['type' => 'public-key', 'alg' => -7]]
            ]
        ]);
    }

    // Method to complete fingerprint registration
    public function completeRegistration($data) {
        header('Content-Type: application/json');
        session_start();

        $userId = session_id(); // Using session ID as a temporary identifier
        if (!$userId) {
            return json_encode(['message' => 'Session expired, please try again.']);
        }

        $credentialId = $data['id'] ?? null;
        if ($credentialId) {
            // Prepare fingerprint data for insertion
            $fingerprintData = [
                "userID" => $userId,
                "credential_id" => $credentialId,
                "created_at" => date('Y-m-d H:i:s')
            ];

            // Insert fingerprint data using quick_insert
            $this->quick_insert("user_fingerprints", [$fingerprintData], "Fingerprint created successfully");

            return json_encode(['message' => 'Fingerprint registered successfully!']);
        } else {
            return json_encode(['message' => 'Registration failed.']);
        }
    }

    // Method to initiate fingerprint login (no email input)
    public function login() {
        header('Content-Type: application/json');
        session_start();

        $userId = session_id(); // Using session ID as a temporary identifier

        // Fetch fingerprint record
        $fingerprint = $this->getall("user_fingerprints", "userID = ?", [$userId], fetch: "details");
        if (!$fingerprint) {
            return json_encode(['message' => 'No fingerprint data found']);
        }

        $credentialId = $fingerprint['credential_id'];
        $challenge = bin2hex(random_bytes(32));
        $_SESSION['challenge'] = $challenge;

        // Return WebAuthn login options
        return json_encode([
            'publicKey' => [
                'challenge' => $challenge,
                'allowCredentials' => [['id' => base64_encode($credentialId), 'type' => 'public-key']],
                'timeout' => 60000,
                'userVerification' => 'preferred'
            ]
        ]);
    }

    // Method to complete fingerprint login
    public function completeLogin($data) {
        header('Content-Type: application/json');
        session_start();

        $userId = session_id(); // Using session ID as identifier
        $credentialId = $data['id'] ?? null;

        if (!$userId || !$credentialId) {
            return json_encode(['message' => 'Invalid session or request']);
        }

        // Fetch the fingerprint details
        $fingerprint = $this->getall("user_fingerprints", "userID = ?", [$userId], fetch: "details");
        if ($fingerprint && $fingerprint['credential_id'] === $credentialId) {
            return json_encode(['message' => 'Login successful!']);
        } else {
            return json_encode(['message' => 'Login failed.']);
        }
    }
}