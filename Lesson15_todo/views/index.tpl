{extends file="layouts/app.tpl"}

{block name="content"}
    <h1 class="mb-3">{$title}</h1>
    <div class="card card-body">
        <form class="d-flex flex-row" method="post" action="/todos/store">
            <input class="form-control mr-3" type="text" name="name" placeholder="Новая задача...">
            <div class="custom-control custom-checkbox mt-2 mr-2">
                <input type="checkbox" class="custom-control-input" id="toggle-new" name="done">
                <label class="custom-control-label" for="toggle-new"></label>
            </div>
            <button class="btn btn-success">Создать</button>
        </form>
    </div>
    {include file="todo_list.tpl"}
{/block}