<div class="container-data_list">
    <h3 class="heading-detail m-0 pb-4">Danh mục sản phẩm</h3>
    <ul class="data-list list-unstyled p-0 m-0">
      @foreach ($all_cat as $cat)
          
        <li class="data-item">
          <div class="d-flex align-items-center py-3">
            <i class="fa-solid fa-angles-right px-2"></i>
            <div class="wrap-item d-flex align-items-center justify-content-between">
              <a href="{{ $cat->cat_alias }}" class="data-link">{{ $cat->name }}</a>
              <i class="show-data fa-solid fa-angle-down mr-3"></i>
            </div>
          </div>
          <div class="item-detail ml-4 mr-4 mb-3">
            <ul class="list-unstyled p-0 m-0">
                @foreach($cat->product as $article)
                  <li class="d-flex align-items-start">
                    <i class="icon-show fa-solid fa-angles-right px-2 pt-2"></i>
                    <div>
                      <a href="{{$article->product_alias}}" class="item-detail_link">{{$article->name}}</a>
                    </div>
                  </li>
                @endforeach
            </ul>
          </div>
        </li>
      @endforeach
      
    </ul>
</div>