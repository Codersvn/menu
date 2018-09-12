<nav class="{{ $class_menu }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 menu_col">
                <ul>
                    @foreach ($getMenus as $item)
                        <li>
                            <a href="{{ $item->link }}">{{ $item->label }}</a>
                            {!! $item->renderSubmenu() !!}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>