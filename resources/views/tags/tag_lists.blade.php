@foreach ($tags as $tag)
    <li class="main__aside__body__tags-card__list__item">
        <button type="button" class="show-tag-btn bg-transparent border-0 w-100">
            <span style="background-color: {{$tag->color}}" class="show-tag-btn__color"></span>
            {{$tag->name}}
        </button>
    </li>
@endforeach
