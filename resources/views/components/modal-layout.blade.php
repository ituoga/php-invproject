<div class="modal__wrap modal__wrap--info">

  @if(!empty($title))
    <a href="#" class="modal__close js-modal-close" aria-label="uzdaryti"><i class="icon-close" aria-hidden="true"></i></a>
    <h4 id="js-modal-title">{{ $title }}</h4>
  @endif

  {{ $slot }}

</div>