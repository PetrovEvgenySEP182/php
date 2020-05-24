<link rel="stylesheet" href="style/main.css"/>


<div class="container">

    <form class="new-book-container" action="/books" method="POST">
        <div>
            <input type="text" name="name" placeholder="Название...">
            <input type="text" name="author" placeholder="Автор...">
        </div>
        <button>Добавить</button>
    </form>

    <ul class="books-container">
        {foreach $books as $book}
            <li>
                <div>
                    {$book->author}, "{$book->name}"
                </div>
                <form action="/books/delete/{$book->id}" method="post">
                    <button>Удалить</button>
                </form>
            </li>

        {/foreach}
    </ul>

</div>



