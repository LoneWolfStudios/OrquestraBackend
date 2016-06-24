<div ng-controller="PinCreateCtrl">
    <div class="row">
        <div class="col s12 m12 l6 offset-l3">
            <div class="card-panel">
                <h4 class="header2">Dados do Pinos</h4>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" ng-model="pin.name">
                                <label for="first_name" class="">ID</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="message" class="materialize-textarea" ng-model="pin.desc"></textarea>
                                <label for="message" class="" >Descrição</label>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="button" ng-click="create()" name="action">Criar
                                        <i class="mdi-content-send right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>