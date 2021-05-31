@extends('frontend.master')
@section('title')
    <title>Giỏ hàng</title>
@endsection
@section('content')
  <!-- Section cart -->
  <section class="section my-5 pb-5">

    <div class="card card-ecommerce">
      <div class="card-body">

      @include('frontend.cart.cartlist')
      @if(session('cart'))
      <div style="float: right;">
              <a class="btn btn-secondary text-white" data-toggle="modal" data-target="#destroyCartModal"><i class="fas fa-trash-alt"></i> Hủy giỏ hàng</a>
              <a href="{{url('/order')}}" class="btn btn-success">Đặt hàng</a>
      </div>
      @endif
      </div>


    </div>
<!-- destroy cart ? Modal-->
    <div class="modal fade" id="destroyCartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn hủy giỏ hàng?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đồng ý" bên dưới để hủy giỏ hàng.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                    <a class="btn btn-primary" href="{{url('/destroyCartList')}}">Đồng ý</a>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- /Section cart -->
  <script type="text/javascript">
    function deleteCartList(id){
        $.ajax({
            url : 'deleteCartList/'+id,
            type : 'get'
        }).done(function(response){
            $('.table-responsive').empty();
            $('.table-responsive').html(response);
        });
    }
    function updateCartList(id){
        $.ajax({
            url : 'updateCartList/'+id+'/'+$('.table-responsive .quantity'+id).val(),
            type : 'get'
        }).done(function(response){
            $('.table-responsive').empty();
            $('.table-responsive').html(response);
        });
    }
    /*cart bên trang cart vì bị lỗi @@*/
        function quantityCartList(id){
        var value = $('.table-responsive .quantity'+id).val();
        value = value.replace(/[^0-9]/img,"");
        $('.table-responsive .quantity'+id).val(value);
        var max =parseInt($('.table-responsive .quantity'+id).attr('max'));
        if(value>max) $('.table-responsive .quantity'+id).val(max);
        }
</script>
@endsection

