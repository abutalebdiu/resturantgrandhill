<!-- Modal -->
<div class="modal fade room_book" id="booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Book (<span id="room_no"></span>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Regular price</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="Regular price" readonly>
                            </div>
                        </div>

                        <input type="hidden" name="room_id" id="room_id">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Discount price</label>
                                <input type="number" name="discount_price" id="discount_price" class="form-control" placeholder="Discount price" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payable Amount</label>
                                <input type="number" name="payable_amount" class="form-control payable_amount" placeholder="Ex: 2000">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Number of person</label>
                                <input type="number" name="person" id="person" class="form-control" placeholder="Ex: 2">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" id="AddToCart">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade room_book" id="book-now" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" action="{{ request('booking_id') ? route('admin.booking.update', request('booking_id')):route('admin.booking.store') }}" method="POST">
                    @csrf

                    @if (request('booking_id'))
                    @method('put')
                    @endif

                    <div class="row">

                        @if (!request('booking_id'))
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Check in</label>
                                <input type="date" min="{{ Carbon\Carbon::today() }}" name="checkin" id="checkin" class="form-control" placeholder="check in">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Check out</label>
                                <input type="date" name="checkout" id="checkout" class="form-control" placeholder="check out">
                            </div>
                        </div>
                        @endif

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Total Price</label>
                                <input type="number" name="total_price" id="total_price" class="form-control total_price" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Discount Price</label>
                                <input type="number" name="after_discount" class="form-control after_discount" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Payable Amount</label>
                                <input type="number" id="original_amount" name="original_amount" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Paid Amount</label>
                                <input type="number" id="paid_amount" name="paid_amount" class="form-control paid_amount">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Still Dues</label>
                                <input type="number" id="still_dues" name="still_dues" class="form-control still_dues" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Booking Type</label>
                                <select name="booking_type" id="booking_type" class="form-control">
                                    <option value="booking">Booking</option>
                                    <option value="rent">Rent</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Payment Type</label>
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="cash">Cash</option>
                                    <option value="bKash">bKash</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Nagad">Nagad</option>
                                    <option value="DBBL">DBBL</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Vat</label>
                                <input type="number" id="vat" name="vat" class="form-control" placeholder="Ex: 100">
                            </div>
                        </div>

                        @if (!request('booking_id'))
                        <div class="col-12 py-1">
                            <h4>Billing Information</h4>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Ex: 100">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Ex: 100">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Ex: 017*********">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Alternative Mobile</label>
                                <input type="number" name="alternative_mobile" id="alternative_mobile" class="form-control" placeholder="Ex: 017*********">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nid</label>
                                <input type="number" name="nid" class="form-control" placeholder="Ex: 100">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="addreas" id="addreas" class="form-control" placeholder="Ex: Narayanganj, Fatullah, Dhaka">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea name="notes" placeholder="Ex: Notes" class="form-control"></textarea>
                            </div>
                        </div>
                        @endif

                        <div class="col-12 text-right">
                            <div class="form-group">
                                <button type="button" id="book-btn" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@push('js')

    <script>

        $("#vat").change(function() {
            var vat = $("#vat").val();
            var original_amount = $("#original_amount").val();
            $("#original_amount").val(parseInt(original_amount) + parseInt(vat));
        });

        $(".paid_amount").change(function() {
            var paid_amount = $(".paid_amount").val();
            var original_amount = $("#original_amount").val();
            $(".still_dues").val(original_amount - paid_amount);
        });

        $("#book-btn").on('click', function() {

            if($('#checkin').val() == '' || $('#checkout').val() == '' || $('.total_price').val() == '' || $('.after_discount').val() == '' || $('#original_amount').val() == '' || $('#name').val() == '' || $('#mobile').val() == '') {
                toastr.error("Field must not be empty.")
                return;
            } else {
                $( "#form" ).submit();
            }
        });

        function bookNow() {

            var checkin = $('.checkin').val();
            var checkout = $('.checkout').val();
            $('#checkin').val(checkin);
            $('#checkout').val(checkout);

            $('#book-now').modal('show');

            $.ajax({
                url: `{!! route('admin.booking.create') !!}`,
                success: function(res) {
                    $('.total_price').val(res.total_price)
                    $('.after_discount').val(res.payable_amount)
                    $('#original_amount').val(res.payable_amount)
                },
                error: function(e) {
                    console.log(e);
                    // toastr.error('These credentials do not match our records.')
                }
            });
        }

        function showModal(id) {

            $('#booking').modal('show');

            $.ajax({
                url: `{!! route('admin.room.index') !!}/${id}`,
                success: function(res) {
                    $('#price').val(res.price)
                    $('#room_id').val(res.id)
                    $('#room_no').text(res.room_no)
                    $('#discount_price').val(res.discount_price)
                    $('.payable_amount').val(res.discount_price);
                },
                error: function(e) {
                    console.log(e);
                    // toastr.error('These credentials do not match our records.')
                }
            });
        }

        $('#AddToCart').on('click', function() {

            var discount_price = $('#discount_price').val();
            var room_id = $('#room_id').val();
            var person = $('#person').val();
            var price = $('#price').val();
            var payable_amount = $('.payable_amount').val();

            if(discount_price == '' || room_id == '' || person == '' || price == '' || payable_amount == '')
            {
                toastr.error('Field must not be empty.');
                return 0;
            }

            $.ajax({
                method: 'POST',
                url: `{!! route('admin.carts.store') !!}`,
                data: {
                    discount_price: discount_price,
                    room_id: room_id,
                    person: person,
                    price: price,
                    payable_amount: payable_amount,
                },
                success: function(res) {
                    $('#booking').modal('hide');
                    toastr.success(res)
                    clearFields()
                    cartItems()
                },
                error: function(error) {
                    console.log(error);
                    toastr.error(error.responseText)
                }
            });

        })

        function clearFields() {
            $('#price').val('')
            $('#room_id').val('')
            $('#room_no').val('')
            $('#discount_price').val('')
            $('.payable_amount').val('')
            $('#person').val('')
        }

    </script>

@endpush


