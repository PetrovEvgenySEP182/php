<form action="/books" method="POST">
    <input type="text" name="name" placeholder="Название...">
    <input type="text" name="author" placeholder="Автор...">
    <button>Создать</button>
</form>

<ul>
    {foreach $books as $book}
        <li>
            {$book->author}, "{$book->name}"
            <form action="/books/delete/{$book->id}" method="post">
                <button>Удалить</button>
            </form>
        </li>
    {/foreach}
</ul>

