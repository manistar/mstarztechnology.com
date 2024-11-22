const messageDiv = document.getElementById('message');

async function registerFingerprint() {
    try {
        const response = await fetch('passer', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ fingerprint_auth: 'register' })
        });
        const options = await response.json();

        const credential = await navigator.credentials.create({ publicKey: options.publicKey });

        const registrationResponse = {
            id: credential.id,
            rawId: Array.from(new Uint8Array(credential.rawId)),
            type: credential.type,
            response: {
                attestationObject: Array.from(new Uint8Array(credential.response.attestationObject)),
                clientDataJSON: Array.from(new Uint8Array(credential.response.clientDataJSON))
            }
        };

        const completeResponse = await fetch('passer', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ fingerprint_auth: 'register_complete', ...registrationResponse })
        });
        const resultData = await completeResponse.json();
        messageDiv.innerHTML = resultData.message;
    } catch (error) {
        messageDiv.innerHTML = "Registration failed.";
    }
}

async function loginFingerprint() {
    try {
        const response = await fetch('passer', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ fingerprint_auth: 'login' })
        });
        const options = await response.json();

        const assertion = await navigator.credentials.get({ publicKey: options.publicKey });

        const loginResponse = {
            id: assertion.id,
            rawId: Array.from(new Uint8Array(assertion.rawId)),
            type: assertion.type,
            response: {
                authenticatorData: Array.from(new Uint8Array(assertion.response.authenticatorData)),
                clientDataJSON: Array.from(new Uint8Array(assertion.response.clientDataJSON)),
                signature: Array.from(new Uint8Array(assertion.response.signature))
            }
        };

        const completeResponse = await fetch('passer', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ fingerprint_auth: 'login_complete', ...loginResponse })
        });
        const resultData = await completeResponse.json();
        messageDiv.innerHTML = resultData.message;
    } catch (error) {
        messageDiv.innerHTML = "Login failed.";
    }
}

document.getElementById('registerFingerprint').addEventListener('click', registerFingerprint);
document.getElementById('loginFingerprint').addEventListener('click', loginFingerprint);