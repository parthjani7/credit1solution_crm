@extends('app')

@section('content')
    <div class="container" ng-app="TrustModule" ng-controller="TrustController">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div topSlider class="panel panel-default">
                    {!! Form::open(array('url' => 'home/you-trust','class'=>'form-homepage', 'enctype' => 'multipart/form-data')) !!}

                    <div class="form-group">
                        {!! Form::label('you_trust_left','Content Left Top'); !!}
                        {!! Form::textarea('you_trust_left',$result['you_trust_left'],['class'=>'form-control ta']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('you_trust_right','Content Right Top'); !!}
                        {!! Form::textarea('you_trust_right',$result['you_trust_right'],['class'=>'form-control ta']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('you_trust_iframe','Iframe For Video'); !!}
                        {!! Form::textarea('you_trust_iframe',$result['you_trust_iframe'],['class'=>'form-control']); !!}
                    </div>

                      <div class="form-group">
                      {!! Form::button('Submit',['class'=>'form-control btn btn-success','style'=>'margin-top:10px','id'=>'submit','ng-click'=>'sendRequest()'] ) !!}
                     </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
            <div ng-show="request.isActive" class="col-md-10  col-md-offset-1 alert alert-dismissable" ng-class="request.alert">
               <button type="button" class="close" ng-click="clearRequest()" ng-hide="request.type=='request'">&times;</button>
               <h4><i class="icon fa" ng-class="request.icon"></i>(( request.message ))</h4>
            </div>
        </div>
    </div>

@endsection

@section("extrascripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.all.min.js" integrity="sha512-ng0ComxRUMJeeN1JS62sxZ+eSjoavxBVv3l7SG4W/gBVbQj+AfmVRdkFT4BNNlxdDCISRrDBkNDxC7omF0MBLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/') }}js/angular/footer.js" type="text/javascript"></script>
@stop

@section("extrastyles")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.min.css" integrity="sha512-Bhi4560umtRBUEJCTIJoNDS6ssVIls7oiYyT3PbhxZV+9uBbLVO/mWo56hrBNNbIfMXKvtIPJi/Jg+vpBpA7sg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
