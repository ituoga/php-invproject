@props(['filter'=>null, 'createNew'=>null])

<div class="row align-items-center">
    <div class="col m-b-20 site-buttons">
        <a href="{{ $filter }}" class="btn btn--secondary" aria-label="filtras"><i class="icon-filter" aria-hidden="true"></i></a>
        <a href="{{ $createNew }}" class="btn btn--secondary"><i class="icon-plus" aria-hidden="true"></i><span
                class="hidden-xs">Sukurti naują</span></a>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 m-b-20 order-sm-first">
        <form action="#" class="clearfix">
            <label for="id-047724" class="visually-hidden">ieškoti</label>
            <div class="form-regular__wrap">
                <button class="form-regular__icon"><i class="icon-search" aria-hidden="true"></i></button>
                <input type="text" name="text" placeholder="Ieškoti kliento" id="id-047724">
            </div>
        </form>
    </div>
</div>