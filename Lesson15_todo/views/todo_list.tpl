<ul class="list-group">
        {foreach $todos as $todo}
                <li class="list-group-item d-flex align-items-center">

                        <div class="toggle-checkbox custom-control custom-checkbox mr-3" data-target="toggle-form-{$todo->id}">
                                <input type="checkbox" class="custom-control-input" id="toggle-{$todo->id}" {if $todo->done}checked{/if}>
                                <label class="custom-control-label" for="toggle-{$todo->id}"></label>
                        </div>

                        <form id="toggle-form-{$todo->id}" action="/todos/toggle/{$todo->id}" method="POST"></form>

                        <input type="text" class="pl-0 border-0 shadow-none update-todo form-control mr-3"
                               value="{$todo->name}" required placeholder="Пусто..."
                                {if $todo->done} style="text-decoration: line-through" {/if}>

                        <form action="/todos/update/{$todo->id}" method="POST">
                                <input class="update-input" type="hidden" name="name" value="" required>
                                <button class="update-btn btn btn-secondary mr-3" disabled>
                                        Обновить
                                </button>
                        </form>

                        <form class="ml-auto" action="/todos/delete/{$todo->id}" method="POST">
                                <button class="btn btn-danger">
                                        Удалить
                                </button>
                        </form>
                </li>
        {/foreach}
</ul>

<script>
        $('.update-todo').on('input', function () {
                $(this)
                        .closest('li')
                        .find('.update-btn')
                        .removeClass('btn-secondary')
                        .addClass('btn-info')
                        .attr('disabled', false);

                let input = $(this)
                        .closest('li')
                        .find('.update-input')[0];

                input.value = this.value;
        });

        $('.toggle-checkbox').on('click', function () {

                let target = this.dataset.target;
                document.getElementById(target).submit();

        });

</script>