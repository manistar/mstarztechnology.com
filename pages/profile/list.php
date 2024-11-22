<style>
    /* General page styles */
/* General page styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    margin: 0;
    padding: 0;
}

/* Main section */
.main {
    padding: 50px 0;
}

.container-fluid {
    width: 95%;
    margin: 0 auto;
}

/* Breadcrumb styles */
.breadcrumb {
    padding: 0;
    background: transparent;
    margin: 0;
    list-style: none;
    font-size: 14px;
}

.breadcrumb__item {
    display: inline;
    margin-right: 5px;
}

.breadcrumb__item a {
    color: #007bff;
    text-decoration: none;
}

.breadcrumb__item--active {
    color: #6c757d;
}

.breadcrumb__item a:hover {
    text-decoration: underline;
}

/* Profile styles */
.profile {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.profile__user {
    text-align: center;
}

.profile__avatar {
    margin-bottom: 20px;
}

.profile__avatar img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.profile__meta h3 {
    margin: 10px 0;
    font-size: 18px;
    font-weight: 600;
}

.profile__meta span {
    font-size: 14px;
    color: #888;
}

.nav-pills {
    margin-top: 20px;
}

.nav-pills .nav-link {
    padding: 10px 15px;
    color: #333;
    font-size: 14px;
    border-radius: 4px;
    margin-bottom: 5px;
    /* background-color: #f8f9fa; */
    text-align: left;
}

.nav-pills .nav-link:hover {
    background-color: #007bff;
    color: white;
}

.nav-pills .nav-link.active {
    background-color: #007bff;
    color: white;
}

/* Profile information styles */
.profile-info {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.profile-info table {
    width: 100%;
    border-spacing: 0;
    font-size: 16px;
}

.profile-info th {
    text-align: left;
    padding: 10px 15px;
    font-weight: bold;
    color: #333;
    background-color: #f8f9fa;
}

.profile-info td {
    padding: 10px 15px;
    color: #555;
}

.profile-info td:first-child {
    width: 150px;
}

.profile-info td:last-child {
    font-weight: 500;
}

.profile-info tr:not(:last-child) {
    border-bottom: 1px solid #e5e5e5;
}

/* Navbar specific styles to ensure it's unaffected by profile styles */
.navbar {
    background-color: #343a40;  /* Dark background for the navbar */
    color: white;
}

.navbar a {
    color: white;  /* Ensure links are white */
}

.navbar a:hover {
    color: #f8f9fa;  /* Light color on hover */
}

.navbar .nav-item.active a {
    color: #007bff;  /* Highlight active nav items */
}

/* Responsive design */
@media (max-width: 991px) {
    .row--grid {
        margin-left: -15px;
        margin-right: -15px;
    }

    .col-lg-3 {
        margin-bottom: 30px;
    }

    .profile-info table th,
    .profile-info table td {
        font-size: 14px;
    }
}

@media (max-width: 576px) {
    .profile__avatar img {
        width: 80px;
        height: 80px;
    }

    .profile__meta h3 {
        font-size: 16px;
    }

    .profile__meta span {
        font-size: 12px;
    }

    .nav-pills .nav-link {
        font-size: 12px;
    }
}

</style>
<section class="main">
    <br /><br /><br />
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Profile</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Profile</h2>
                </div>

                <div class="row row--grid">
                    <div class="col-lg-3">
                        <div class="profile">
                            <div class="profile__user">
                                <div class="profile__avatar">
                                <img src="upload/profile/<?= $data['upload_image']; ?>" alt="Image-HasTech">
                                    <!-- <img src="upload/profile/<?= $data['upload_image'];?>" alt> -->
                                </div>
                                <div class="profile__meta">
                                    <h3><?= $data['first_name'].' '.$data['last_name'];?></h3>
                                    <span>User ID: <?= $data['userID'];?></span>
                                </div>
                            </div>

                            <div class="nav flex-column nav-pills">
                           
                                <a href="?p=profile" class="nav-link active"><i class="far fa-user"></i> Profile</a>
                                <!-- <a href="profile-setting.html" class="nav-link"><i class="far fa-cog"></i> Profile
                                    Settings</a>
                                <a href="favourites.html" class="nav-link"><i class="far fa-heart"></i> My
                                    Favourites</a>
                                <a href="orders.html" class="nav-link"><i class="far fa-shopping-cart"></i> My
                                    Orders</a>
                                <a href="playlist.html" class="nav-link"><i class="far fa-list-ul"></i> My Playlist</a>
                                <a href="create-playlist.html" class="nav-link"><i class="far fa-layer-plus"></i> Create
                                    Playlist</a>
                                <a href="upload-music.html" class="nav-link"><i class="far fa-cloud-upload"></i> Upload
                                    Music</a> -->
                                
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9">

                        <div class="row row--grid">
                            <div class="col-lg-8">
                                <div class="profile-info">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Name</th>
                                            <td>:</td>
                                            <td><?= $data['first_name'].' '.$data['last_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td><?= $data['email'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>:</td>
                                            <td><?= $data['phone_number'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>:</td>
                                            <td>
                                                <?php
                                                if($data['country'] == "") {
                                                    echo 'Please insert your Country';
                                                } else {
                                                    echo $data['country'];
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>:</td>
                                            <td> <?php
                                                if($data['state'] == "") {
                                                    echo 'Please insert your State';
                                                } else {
                                                    echo $data['state'].', '.$data['country'];
                                                }
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <th>Join At</th>
                                            <td>:</td>
                                            <td><?=  $date = date('Y-m-d', strtotime($data['date']));?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>