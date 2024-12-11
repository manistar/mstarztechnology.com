<?php
class bar extends database{
    public function control_page($what_i_do){
        $data = $this->validate_form($what_i_do);
        if (is_array($data)) {
            // $data['userID'] = $_SESSION['adminSession'];  
            $data['userID'] = uniqid();
            $data['ID'] = uniqid();  // Assuming you want to set the 'ID' field
            $data['label'] = "what_i_do";
            // $data['feather'] = "<i data-feather='menu'></i>";
            $insert = $this->quick_insert("user_details", $data, "What I Do has been inserted Successfully");
        }
    }

    public function edu_page($education){
        $data = $this->validate_form($education);
        if (is_array($data)) {
            $data['userID'] = uniqid();
            $data['ID'] = uniqid();  // Assuming you want to set the 'ID' field
            $data['label'] = "edu";
            $insert = $this->quick_insert("user_details", $data, "Profesions has been inserted Successfully");
        }
    }

    public function job_page($job_ex){
        $data = $this->validate_form($job_ex);
        if (is_array($data)) {
            $data['userID'] = uniqid();
            $data['ID'] = uniqid();  // Assuming you want to set the 'ID' field
            $data['label'] = "job";
            $insert = $this->quick_insert("user_details", $data, "Profesions has been inserted Successfully");
        }
    }

    public function blog_page($blog){
        $data = $this->validate_form($blog);
        if (is_array($data)) {
            $data['userID'] = uniqid();
            $data['ID'] = uniqid();  // Assuming you want to set the 'ID' field
            $data['label'] = "blog";

            // Add the current timestamp to the data
            $data['created_at'] = date('Y-m-d H:i:s');  // Store the current timestamp in seconds

            $insert = $this->quick_insert("user_details", $data, "News has been posted Successfully");
        }
    }

    public function testimonial_page($testimonial){
        $data = $this->validate_form($testimonial);
        if (is_array($data)) {
            $data['userID'] = uniqid();
            $data['ID'] = uniqid();  // Assuming you want to set the 'ID' field
            $data['label'] = "testimonials";
            $insert = $this->quick_insert("user_details", $data, "Testimonial has been inserted Successfully");
        }
    }

    public function portfolios_page($portfolio){
        $data = $this->validate_form($portfolio);
        if (is_array($data)) {

            // Assuming description field contains HTML content
            $data['content'] = $_POST['content']; // Make sure description is coming from a WYSIWYG editor

            $data['userID'] = uniqid();
            $data['ID'] = uniqid();  // Assuming you want to set the 'ID' field
            $data['label'] = "portfolios";
            $insert = $this->quick_insert("user_details", $data, "portfolios has been inserted Successfully");
        }
    }
}
?>