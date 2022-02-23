@extends('backend.Users.layouts.app') 
@section('title','Purchase Invoice') 
@section('content')

<div id="content" class="content">
   <div class="panel panel-inverse">
      <div class="panel-heading">
         <h4 class="panel-title">Purchases Invoice</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"> <i class="fa fa-expand"></i>
            </a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"> <i class="fa fa-redo"></i>
            </a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"> <i class="fa fa-minus"></i>
            </a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"> <i class="fa fa-times"></i>
            </a>
         </div>
      </div>
      <div class="panel-body">
         <div class="invoice">
            <div class="invoice-company d-flex justify-content-between">
                <span> talentincu.com </span>
               <span>
               <a href="javascript:;" class="btn btn-sm btn-white mb-10px"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
               <a href="javascript:;" onclick="if (!window.__cfRLUnblockHandlers) return false; window.print()" class="btn btn-sm btn-white mb-10px"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
               </span>
            </div>
            <div class="invoice-header">
               <div class="invoice-from">
                  <small>User Information :</small>
                  <address class="mt-5px mb-5px">
                     <strong class="text-inverse">Md Abu Taleb</strong><br>
                     Dhaka Marur Badda<br>
                     Dhaka, 5100<br>
                     Phone: +8801796722657<br>
                     Email: abutalebgmtt@gmail.com  
                    </address>
               </div>
               <div class="invoice-to">
                  <small>Billing Information :</small>
                  <address class="mt-5px mb-5px">
                     <strong class="text-inverse">Company Name</strong><br>
                     Street Address<br>
                     City, Zip Code<br>
                     Phone: (123) 456-7890<br>
                     Fax: (123) 456-7890
                  </address>
               </div>
               <div class="invoice-date">
                  <small>Invoice / July period</small>
                  <div class="date text-inverse mt-5px">August 3,2021</div>
                  <div class="invoice-detail">#0000123DSS
                     <br>Services Product
                  </div>
               </div>
            </div>
            <div class="invoice-content">
               <div class="table-responsive">
                  <table class="table table-invoice">
                     <thead>
                        <tr>
                            <th>SI#</th>
                           <th>PRODUCT NAME</th>
                           <th class="text-center" width="10%">PRICE</th>
                           <th class="text-center" width="10%">	QUENTITY</th>
                           <th class="text-end" width="20%">SUB TOTAL</th>
                        </tr>
                     </thead>
                     <tbody>

                        @foreach($instument_orders as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                           <td>
                                <span class="text-inverse">Website design development</span>
                           </td>
                           <td class="text-center">$50.00</td>
                           <td class="text-center">01</td>
                           <td class="text-end"> asd </td>
                        </tr>
                        @endforeach
                       
                     </tbody>
                  </table>
               </div>
               <div class="invoice-price">
                  <div class="invoice-price-left">
                     <div class="invoice-price-row">
                        <div class="sub-price"> <small>SUBTOTAL</small>
                           <span class="text-inverse">$400.00</span>
                        </div>
                        <div class="sub-price"> <i class="fa fa-plus text-muted"></i>
                        </div>
                        <div class="sub-price"> <small>DELIVERY CHARGE</small>
                           <span class="text-inverse">$10.00</span>
                        </div>
                        <div class="sub-price"> <i class="fa fa-plus text-muted"></i>
                        </div>
                        <div class="sub-price"> <small>VAT</small>
                           <span class="text-inverse">$05.00</span>
                        </div>
                     </div>
                  </div>
                  <div class="invoice-price-right"> <small>TOTAL</small>  <span class="fw-bold">$415.00</span>
                  </div>
               </div>
            </div>
            <div class="invoice-note">* Make all cheques payable to [Your Company Name]
               <br>* Payment is due within 30 days
               <br>* If you have any questions concerning this invoice, contact [Name, Phone Number, Email]
            </div>
            <div class="invoice-footer">
               <p class="text-center mb-5px fw-bold">THANK YOU FOR YOUR PURCHSE</p>
               <p class="text-center"> <span class="me-10px"><i class="fa fa-fw fa-lg fa-globe"></i>talentincu.com/</span>
                  <span class="me-10px"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:+966551175959</span>
                  <span class="me-10px"><i class="fa fa-fw fa-lg fa-envelope"></i> info@talenincu.com</span>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
@section('customjs') @endsection @endsection