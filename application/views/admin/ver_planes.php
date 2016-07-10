<style type="text/css">
	.fa-style{
		font-size: 50px;
		text-align: center;
		-o-transition: all .3s linear;
		color: gold;
	}
	.bg-purpure{
		background-color:#F514DB !important;
		color:white;
	}
	.bg-orange{
		background-color:#FF6300 !important;
		color:white;
	}
	.bg-blue{
		background-color:#3627FF !important;
		color:white;
	}
	.bg-pink{
		background-color:#FF27D2 !important;
		color:white;
	}
</style>
<div class="row" ng-controller="VerPlanes" ng-init="indx = 1">
    <!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12" ng-repeat="plan in planes">
        <!-- PLANES -->
        <div class="small-box {{color[$index]}}">
            <div class="inner" style="text-align: center;">
                <h3 style="text-align: center;">{{plan.name}}</h3>
                <!--i class="fa fa-star fa-style" ng-repeat="plan in planes | limitTo:$index+1"></i-->
            </div>
            <div class="" style="text-align: center;">
                <p>{{plan.description.split('\n')[0]}}</p>
                <p>{{plan.description.split('\n')[1]}}</p>
            </div>
            <a href="#" class="small-box-footer" style="font-size: 20px;">{{plan.price[0].price | currency}} COP</a>
        </div>
    </div>
    
    <!-- /.col -->
</div>