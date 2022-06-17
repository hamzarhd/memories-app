<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('SM') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Souvenir App') }}</a>
        </div>
        <ul class="nav">
          

            <li @if ($pageSlug ?? ''  == 'souvenirs') class="active " @endif>
                <a href="{{ route('souvenirs.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('Souvenirs Management') }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
