<x-app-layout>


    <article class="uk-article">
        <h1 class="uk-article-title">h1</h1>
        <p class="uk-article-meta">content</p>
      </article>

      <a class="uk-button uk-button-default" href="">12312u3812</a>

<button class="uk-button uk-button-default">143oih10r</button>

<button class="uk-button uk-button-default" disabled>12312j3b</button>


<!-- This is a button toggling the modal -->
<button
  class="uk-button uk-button-default uk-margin-small-right"
  type="button"
  uk-toggle="target: #modal-example"
>
  Open
</button>

<!-- This is an anchor toggling the modal -->
<a href="#modal-example" uk-toggle>Open</a>

<!-- This is the modal -->
<div id="modal-example" uk-modal>
  <div class="uk-modal-body uk-modal-dialog">
    <h2 class="uk-modal-title">Headline</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
      veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
      velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
      cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
      est laborum.
    </p>
    <p class="uk-text-right">
      <button class="uk-modal-close uk-button uk-button-default" type="button">
        Cancel
      </button>
      <button class="uk-button uk-button-primary" type="button">Save</button>
    </p>
  </div>
</div>
</x-app-layout>
