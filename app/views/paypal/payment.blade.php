@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="clearfix"></div>
	    <div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					Finaliser mon inscription
				</div>
			</div>
			<div class="portlet-body">
				<div class="row margin-bottom-40">
					<div class="col-md-12">
						<div class="pricing hover-effect">
							<div class="pricing-head">
								<h3>Payement<span>
								par Paypal</span>
								</h3>
								<h4><i>100</i>€</i>
								<span>
								pour la participation </span>
								</h4>
							</div>
							<ul class="pricing-content list-unstyled">
								<li>
									<i class="fa fa-tags"></i> At vero eos
								</li>
								<li>
									<i class="fa fa-asterisk"></i> No Support
								</li>
								<li>
									<i class="fa fa-heart"></i> Fusce condimentum
								</li>
								<li>
									<i class="fa fa-star"></i> Ut non libero
								</li>
								<li>
									<i class="fa fa-shopping-cart"></i> Consecte adiping elit
								</li>
							</ul>
							<div class="pricing-footer">
								<p>
									 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
								</p>
								{{ Form::open(array('url'=>'paypal/payment')) }}
								{{ Form::submit('Payer', array('class'=>'btn blue button-next'))}}
								{{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

