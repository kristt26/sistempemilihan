angular.module('adminctrl', [])
    .controller('homeController', homeController)
    .controller('loginController', loginController)
    .controller('periodeController', periodeController)
    .controller('profileController', profileController)
    .controller('pelangganController', pelangganController)
    .controller('laporanController', laporanController)
    ;
function homeController($scope, HomeServices) {

    $scope.itemHeader = { title: "Home", breadcrumb: "Home", header: "Home" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = {};
    $.LoadingOverlay("hide");
    // HomeServices.get().then(x=>{
    //     $scope.datas = x;
    // })

}

function loginController($scope, AuthService, helperServices) {
    $scope.model = {};

    AuthService.login($scope.modal).then(x => {
        $.LoadingOverlay("hide");
        location.href = helperServices.url + "/home";
    })

}

function periodeController($scope, AuthService, helperServices, periodeServices) {
    $scope.itemHeader = { title: "Periode", breadcrumb: "Periode", header: "Periode" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;

    periodeServices.get().then(res => {
        $scope.datas = res;
        $.LoadingOverlay("hide");
    })

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }

    $scope.save = () => {
        if ($scope.model.id) {
            periodeServices.put($scope.model).then(res => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
            })
        } else {
            periodeServices.post($scope.model).then(res => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
            })
        }
    }

    $scope.delete = (item) => {
        periodeServices.deleted(item).then(res => {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Proses Berhasil'
            })
        })
    }
}
function profileController($scope) {
    $scope.title = "Profile Header";
    $.LoadingOverlay("hide");
}

function pelangganController($scope, helperServices, PelangganServices) {
    $scope.itemHeader = { title: "Pelanggan", breadcrumb: "Pelanggan", header: "Pelanggan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    $scope.dataUpload = [];
    PelangganServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.cekFile = (item) => {

    }
    $scope.edit = () => {

        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }

    $scope.save = () => {
        $.LoadingOverlay("show");
        // $scope.model.roles = helperServices.roles;
        if ($scope.model.id) {
            PelangganServices.put($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        } else {
            PelangganServices.post($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        }
    }

    document.getElementById('files').addEventListener('change', handleFileSelect, false);
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object
        let reader = new FileReader();
        let bytes = 50000;

        reader.onloadend = function (evt) {
            let lines = evt.target.result;
            if (lines && lines.length > 0) {
                let line_array = CSVToArray(lines);
                if (lines.length == bytes) {
                    line_array = line_array.splice(0, line_array.length - 1);
                }
                $scope.$applyAsync(() => {
                    for (let index = 1; index < line_array.length; index++) {
                        if (line_array[index][0]) {
                            var item = { id: line_array[index][0], nama: line_array[index][1].toUpperCase(), alamat: line_array[index][2], hp: "+62" + line_array[index][3], email: line_array[index][4], kecepataninet: line_array[index][6], tanggalbayar: line_array[index][7] };
                            $scope.dataUpload.push(angular.copy(item));
                        }
                    }
                    console.log($scope.dataUpload);
                })
            }
            $("#showDataUpload").modal('show');
        }

        let blob = files[0].slice(0, bytes);
        reader.readAsBinaryString(blob);
    }

    function CSVToArray(strData, strDelimiter) {
        strDelimiter = (strDelimiter || ";");
        let objPattern = new RegExp(
            (
                "(\\" + strDelimiter + "|\\r?\\n|\\r|^)" +
                "(?:\"([^\"]*(?:\"\"[^\"]*)*)\"|" +
                "([^\"\\" + strDelimiter + "\\r\\n]*))"
            ),
            "gi"
        );
        let arrData = [[]];
        let arrMatches = null;
        while (arrMatches = objPattern.exec(strData)) {
            let strMatchedDelimiter = arrMatches[1];
            let strMatchedValue = [];
            if (strMatchedDelimiter.length && (strMatchedDelimiter != strDelimiter)) {
                arrData.push([]);
            }
            if (arrMatches[2]) {
                strMatchedValue = arrMatches[2].replace(new RegExp("\"\"", "g"), "\"");
            } else {
                strMatchedValue = arrMatches[3];
            }
            arrData[arrData.length - 1].push(strMatchedValue);
        }
        return (arrData);
    }
}

function laporanController($scope, helperServices, LaporanServices, PelangganServices) {
    $scope.itemHeader = { title: "Laporan", breadcrumb: "Laporan", header: "Laporan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.model = {};
    $scope.datas = [];
    $scope.a = [];
    setTimeout((x) => {
        $.LoadingOverlay("hide");
    }, 1000);
    $scope.tampil = (item) => {
        $.LoadingOverlay("show");
        var a = item.split(' - ');
        if (a[0] !== a[1]) {
            $scope.model.awal = a[0];
            $scope.model.akhir = a[1];
            LaporanServices.get($scope.model).then(x => {
                $scope.datas = x;
                $.LoadingOverlay("hide");
            })
        }
        $.LoadingOverlay("hide");
    }
    $scope.print = () => {
        $("#print").printArea();
    }
}