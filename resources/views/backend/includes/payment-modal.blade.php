<!-- Modal -->
<div class="modal fade room_book" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="number" name="total_price" id="total_price" class="form-control" placeholder="Regular price" readonly>
                            </div>
                        </div>

                        <input type="hidden" name="booking_id" id="booking_id">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Discount price</label>
                                <input type="number" name="after_discount" id="after_discount" class="form-control" placeholder="Discount price" readonly>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payable Amount</label>
                                <input type="number" name="payable_amount" id="payable_amount" class="form-control" placeholder="Ex: 2000" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Paid Amount</label>
                                <input type="number" name="paid_amount" id="paid_amount" class="form-control" placeholder="Ex: 2000" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Still Dues</label>
                                <input type="number" name="still_dues" id="still_dues" class="form-control" placeholder="Ex: 2000" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New Payment</label>
                                <input type="number" name="new_payment" id="new_payment" class="form-control" placeholder="Ex: 2000">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" id="submit">Add Payment</button>
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

        function addPayment(id){
            $('#payment-modal').modal('show');
            $('#room_no').text(id);
            $('#booking_id').val(id);

            $.ajax({
                url: `{!! route('admin.booking.index') !!}/${id}/edit`,
                success: function(res) {
                    $('#total_price').val(res.total_price)
                    $('#after_discount').val(res.after_discount)
                    $('#payable_amount').val(res.original_amount)
                    $('#paid_amount').val(res.paid_amount)
                    $('#still_dues').val(res.still_dues)
                },
                error: function(e) {
                    console.log(e);
                    // toastr.error('These credentials do not match our records.')
                }
            });
        }

        $('#submit').on('click', function() {

            var total_price = $('#total_price').val();
            var booking_id = $('#booking_id').val();
            var after_discount = $('#after_discount').val();
            var payable_amount = $('#payable_amount').val();
            var paid_amount = $('#paid_amount').val();
            var still_dues = $('#still_dues').val();
            var new_payment = $('#new_payment').val();

            if(total_price == '' || booking_id == '' || after_discount == '' || payable_amount == '' || paid_amount == '' || still_dues == '' || new_payment == '')
            {
            console.log("Ok")
                toastr.error('Field must not be empty.');
                return 0;
            }

            $.ajax({
                method: 'POST',
                url: `{!! route('admin.addpayment') !!}`,
                data: {
                    total_price: total_price,
                    booking_id: booking_id,
                    after_discount: after_discount,
                    payable_amount: payable_amount,
                    paid_amount: paid_amount,
                    still_dues: still_dues,
                    new_payment: new_payment,
                },
                success: function(res) {
                    $('#payment-modal').modal('hide');
                    toastr.success(res)
                    clearFields()
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    toastr.error(error.responseText)
                }
            });

        })

        function clearFields() {
            $('#total_price').val('')
            $('#booking_id').val('')
            $('#after_discount').val('')
            $('#payable_amount').val('')
            $('#paid_amount').val('')
            $('#still_dues').val('')
            $('#new_payment').val('')
        }

    </script>
@endpush
