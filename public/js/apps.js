angular.module('apps', [
    'adminctrl',
    'helper.service',
    'auth.service',
    'services',
    'datatables',
    'naif.base64',
    'message.service',
    'swangular',
    'ngLocale'
])
    .controller('indexController', function ($scope, periodeServices) {
        $scope.titleHeader = "Indihome Sistem";
        $scope.header = "";
        $scope.breadcrumb = "";
        $scope.periode;
        $scope.$on("SendUp", function (evt, data) {
            $scope.header = data.title;
            $scope.header = data.header;
            $scope.breadcrumb = data.breadcrumb;
            if($scope.header=='Periode'){
                $scope.periode = data.periode;
            }
            $.LoadingOverlay("hide");
        });
        periodeServices.get().then(res=>{
            $scope.periode = res.find(x=>x.status == "1");
        })
    });
