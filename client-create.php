<?php
include_once('./partial/head.php');

?>

<body>
<?php include_once('./partial/header.php')?>

    <main>
    <h3>Create</h3>
        <form action="client-store.php" method="post">
            <label>Name: 
                <input type="text" name="name">
            </label>
            <label>Address: 
                <input type="text" name="address">
            </label>
            <label>Zip code: 
                <input type="text" name="zipCode" placeholder="H4H 4H4">
            </label>
            <label>Phone: 
                <input type="text" name="phone" placeholder="514-555-5555">
            </label>
            <label>Email: 
                <input type="email" name="email" placeholder="email@email.com">
            </label>
            <label>Date of Birth: 
                <input type="date" name="dob" placeholder="1954">
            </label>
            <input type="submit" value="save">
        </form>
    </main>
</body>
</html>
