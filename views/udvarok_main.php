<style>
    .py-5 {
        background-color: #3498db; /* A shade of blue, you can change this color */
        color: #ffffff; /* Text color, you can change this color */
        padding: 80px 0; /* Adjust padding as needed */
        text-align: center; /* Center align text within the section */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        border-radius: 10px; /* Add rounded corners */
    }

    .container {
        /* Your styles for the container */
    }

    .row {
        /* Your styles for the row */
    }
</style>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php echo WasteSite::getWasteSites() ?>
        </div>
    </div>
</section>

<!-- Footer -->
