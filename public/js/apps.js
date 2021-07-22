angular.module('apps', [
    'adminctrl',
    'helper.service',
    'auth.service',
    'services',
    'datatables',
    'naif.base64'
])
    .controller('indexController', function ($scope) {
        $scope.titleHeader = "Indihome Sistem";
        $scope.header = "";
        $scope.breadcrumb = "";
        $.LoadingOverlay("show");
        $scope.$on("SendUp", function (evt, data) {
            $scope.header = data.title;
            $scope.header = data.header;
            $scope.breadcrumb = data.breadcrumb;
        });
    });
