<?php
// phpcs:ignoreFile

$id = $_REQUEST['id'];

require_once LIBRARY_PRESS_PLUGIN_PATH.'/functions.php';

$book_list = get_books_by_shelf( $id );
$book_shelf = lp_get_row( $id, 'library_press_tbl_book_shelf' );
$shelf_name = $book_shelf->shelf_name;

?>

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2><?php echo $shelf_name; ?></h2>
        <h6>Books: <?php echo count( $book_list ); ?></h6>                               
    </div>
    <table class="table table-striped table-bordered" id="booksTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Publication</th>
                <th>Book Cover</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if( count( $book_list ) > 0 ) :
                    $id = 0;
                    foreach ( $book_list as $book ) :
                    $id++;
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $book->book_name; ?></td>
                        <td><?php echo $book->email; ?></td>
                        <td><?php echo $book->publication; ?></td>
                        <td>
                            <img style="width: 40px; height: 40px;" src="<?php echo $book->book_image; ?>">
                        </td>
                        <td>$<?php echo $book->amount; ?></td>
                        <td><?php echo $book->description; ?></td>
                        
                    </tr>
                    <?php endforeach;
                    elseif( count( $book_list ) == 0 ):?>
                    <tr>
                        <td class="text-center text-danger" colspan="7"><?php _e('No books found!', 'table-press'); ?></td>
                    </tr>
                    <?php
                endif;
            ?>
        </tbody>
    </table>
     <!-- Pagination controls -->
    <?php if ( count( $book_list ) != 0): ?>
     <nav>
        <ul class="pagination justify-content-center" id="pagination">
            <!-- Pagination buttons will be dynamically added here -->
        </ul>
    </nav>
    <?php endif; ?>
</div>


<script>
    // JavaScript to implement pagination
    const rowsPerPage = 10; // Set the number of rows per page
    const table = document.getElementById('booksTable');
    const rows = table.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    const pagination = document.getElementById('pagination');

    // Function to display the rows for the current page
    function showPage(pageNumber) {
        const startIndex = (pageNumber - 1) * rowsPerPage;
        const endIndex = pageNumber * rowsPerPage;

        // Loop through all rows and show only the ones for the current page
        rows.forEach((row, index) => {
            if (index >= startIndex && index < endIndex) {
                row.style.display = ''; // Show row
            } else {
                row.style.display = 'none'; // Hide row
            }
        });
    }

    // Function to create the pagination buttons
    function createPagination() {
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            const a = document.createElement('a');
            a.classList.add('page-link');
            a.textContent = i;
            a.href = '#';
            a.addEventListener('click', (e) => {
                e.preventDefault();
                showPage(i); // Show the page when clicked
            });
            li.appendChild(a);
            pagination.appendChild(li);
        }
    }

    // Initially display the first page and create pagination controls
    showPage(1);
    createPagination();
</script>
