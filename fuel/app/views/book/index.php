<form method="get" action="/book/index">
    <input type="text" class="form-control" id="search"
           placeholder="Search book" name="search_book_name"
           value="<?php echo $search_book_name; ?>"
    />
    <button type="submit" class="btn btn-primary"> Search </button>
</form>
<ul>
    <?php
    foreach ($categories as $category) {
    ?>
        <a href = "/book/index?selected_category=<?php echo $category['code']; ?>"><?php echo $category['name']; ?></a>
        <?php
    }
    ?>
</ul>
<table class = "table">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
        <th></th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach($books as $book) {
        ?>

        <tr>
            <td><?php echo $book['id']; ?></td>
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['author']; ?></td>
            <td><?php echo $book['price']; ?></td>
            <td>
                <?php if (Auth::member(100)): ?>
                    <a href = "/book/edit/<?php echo $book['id']; ?>">Edit</a>
                    <a href = "/book/delete/<?php echo $book['id']; ?>">Delete</a>
                <?php endif; ?>
                <?php if (Auth::member(1)): ?>
                    <a href = "">Hire</a>
                <?php endif; ?>
            </td>
        </tr>

        <?php
    }
    ?>
    </tbody>
</table>
<ul>
</ul>