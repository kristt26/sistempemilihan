angular.module('adminctrl', [])
    .controller('homeController', homeController)
    .controller('loginController', loginController)
    .controller('kriteriaController', kriteriaController)
    .controller('periodeController', periodeController)
    .controller('profileController', profileController)
    .controller('pelangganController', pelangganController)
    .controller('seleksiController', seleksiController)
    .controller('historyController', historyController)
    ;
function homeController($scope, HomeServices) {

    $scope.itemHeader = { title: "Home", breadcrumb: "Home", header: "Home" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = {};
    setTimeout(() => {
        $.LoadingOverlay("hide");
    }, 300);
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

function kriteriaController($scope, AuthService, helperServices, kriteriaServices, message) {
    $scope.itemHeader = { title: "Kriteria", breadcrumb: "Kriteria", header: "Kriteria" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.subKriteria = [];
    $scope.model = {};
    $scope.modelSub = {};
    $scope.simpan = true;
    $scope.simpanSub = true;
    $scope.dialogSub = false;

    kriteriaServices.get().then(res => {
        res.forEach(element => {
           element.bobot = parseFloat(element.bobot);
           element.subkriteria.forEach(sub => {
               sub.bobot = parseFloat(sub.bobot);
           });
        });
        $scope.datas = res;
        $.LoadingOverlay("hide");
    })

    $scope.edit = (item, set) => {
        if(set=="kriteria"){
            $scope.model = angular.copy(item);
            $scope.simpan = false;
            $scope.dialogSub = false;
            $scope.simpanSub = true;
            $scope.modelSub = {};
        }else{
            $scope.modelSub = angular.copy(item);
            $scope.simpanSub = false;
            $scope.simpan = true;
            $scope.model = {};
        }
    }

    $scope.showSub = (item) => {
        $scope.subKriteria = item;
        $scope.modelSub.kriteriaid = $scope.subKriteria.id;
        $scope.dialogSub = true;
    }

    $scope.save = (set) => {
        if(set=="kriteria"){
            if ($scope.model.id) {
                kriteriaServices.put($scope.model).then(res => {
                    $scope.$emit("SendUp", $scope.itemHeader);
                    message.info("Proses Berhasil");
                    $scope.model={};
                })
            } else {
                kriteriaServices.post($scope.model).then(res => {
                    $scope.$emit("SendUp", $scope.itemHeader);
                    message.info("Proses Berhasil");
                    $scope.model={};
                })
            }
        }else{
            if ($scope.model.id) {
                kriteriaServices.putSub($scope.modelSub).then(res => {
                    $scope.$emit("SendUp", $scope.itemHeader);
                    message.info("Proses Berhasil");
                    $scope.model={};
                    $scope.model.kriteriaid = $scope.subKriteria.id;
                })
            } else {
                kriteriaServices.postSub($scope.modelSub).then(res => {
                    $scope.$emit("SendUp", $scope.itemHeader);
                    message.info("Proses Berhasil");
                    $scope.model={};
                    $scope.model.kriteriaid = $scope.subKriteria.id;
                })
            }
        }
    }

    $scope.delete = (item, set) => {
        if(set=="kriteria"){
            kriteriaServices.deleted(item).then(res => {
                message.info("Berhasil")
            })
        }else{
            kriteriaServices.deletedSub(item).then(res => {
                message.info("Berhasil")
            })
        }
    }
}
function periodeController($scope, AuthService, helperServices, periodeServices, message) {
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
        message.dialogmessage("Ingin Melanjutkan?", "Ya", "Tidak").then(x=>{
            $.LoadingOverlay("show");
            if ($scope.model.id) {
                periodeServices.put($scope.model).then(res => {
                    $scope.itemHeader = { title: "Periode", breadcrumb: "Periode", header: "Periode", periode: res };
                    $scope.$emit("SendUp", $scope.itemHeader);
                    $scope.model = {};
                    $scope.simpan = true;
                    $.LoadingOverlay("hide");
                    message.info("Proses Berhasil");
                })
            } else {
                periodeServices.post($scope.model).then(res => {
                    $scope.itemHeader = { title: "Periode", breadcrumb: "Periode", header: "Periode", periode: res };
                    $scope.$emit("SendUp", $scope.itemHeader);
                    $scope.model = {};
                    $scope.simpan = true;
                    $.LoadingOverlay("hide");
                    message.info("Proses Berhasil");
                })
            }
        })
    }

    $scope.delete = (item) => {
        periodeServices.deleted(item).then(res => {
            message.info("Proses Berhasil");
        })
    }
}
function profileController($scope) {
    $scope.title = "Profile Header";
    $.LoadingOverlay("hide");
}

function pelangganController($scope, helperServices, PelangganServices, periodeServices, message) {

    $scope.itemHeader = { title: "Pelanggan", breadcrumb: "Pelanggan", header: "Pelanggan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    $scope.dataUpload = [];
    $scope.periode = {}
    PelangganServices.get().then(x => {
        $scope.datas = x;
        periodeServices.get().then(res => {
            $scope.periode = res.find(x => x.status == "1");
            $.LoadingOverlay("hide");
        })
    })
    $scope.cekFile = (item) => {

    }
    $scope.edit = () => {

        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }

    $scope.save = (datas) => {
        message.dialog("Anda Yakin?", "Ya", "Tidak").then(x => {
            $("#showDataUpload").modal('hide');
            $.LoadingOverlay("show");
            PelangganServices.post(datas).then(result => {
                $scope.datas = result;
                message.info("Proses berhasil!");
                $scope.dataUpload = [];
                $scope.clear();
                $.LoadingOverlay("hide");
            })
        })
    }

    document.getElementById('files').addEventListener('change', handleFileSelect, false);
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object
        let reader = new FileReader();
        let bytes = 50000;

        reader.onloadend = function (evt) {
            $.LoadingOverlay("show");
            let lines = evt.target.result;
            if (lines && lines.length > 0) {
                let line_array = CSVToArray(lines);
                if (lines.length == bytes) {
                    line_array = line_array.splice(0, line_array.length - 1);
                }

                // const groups = line_array.reduce((groups, item) => ({
                //     ...groups,
                //     [item.pelangganid]: [...(groups[item.pelangganid] || []), item]
                // }), {});

                // console.log(groups);

                
                $scope.$applyAsync(() => {
                    line_array.sort(sortFunction);
                    var set;
                    for (let index = 0; index < line_array.length-1; index++) {
                        if (line_array[index][0] && line_array[index][0] != set) {
                            var item = { idpelanggan: line_array[index][0], nama: line_array[index][1].toUpperCase(), alamat: line_array[index][2], hp: "+62" + line_array[index][3], email: line_array[index][4], paket: line_array[index][6], tanggalbayar: line_array[index][7], periodeid: $scope.periode.id, aktif: line_array[index][8].substring(line_array[index][8].length - 4), status: 1 };
                            $scope.dataUpload.push(angular.copy(item));
                        }
                        set = line_array[index][0];
                    }
                    console.log($scope.dataUpload);
                    $("#showDataUpload").modal('show');
                    $.LoadingOverlay("hide");
                })
            }
        }

        let blob = files[0].slice(0, bytes);
        reader.readAsBinaryString(blob);
    }

    function sortFunction(a, b) {
        if (a[0] === b[0]) {
            return 0;
        }
        else {
            return (a[0] < b[0]) ? -1 : 1;
        }
    }

    function CSVToArray(strData, strDelimiter) {
        strDelimiter = (strDelimiter || ",");
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

    $scope.clear = () => {
        document.getElementById("files").value = "";
        $("#showDataUpload").modal('hide');
    }

    $scope.deleted = (param)=>{
        message.dialog("ingin membersihkan data?", "Ya", "Tidak").then(x=>{
            PelangganServices.deleted(param).then(res=>{
                $scope.datas = [];
                message.info("Success!!!");
            })
            // console.log(param);
        })
    }
}

function seleksiController($scope, AuthService, helperServices, seleksiServices, message, periodeServices) {
    $scope.itemHeader = { title: "Seleksi", breadcrumb: "Seleksi", header: "Seleksi" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    $scope.jumlahRanking = 0;
    $scope.tampil = false;
    $scope.dataSend = [];
    $scope.dataKirim = {};
    $scope.periode = {};

    seleksiServices.get().then(res => {
        $scope.datas = res;
        periodeServices.get().then(res => {
            $scope.periode = res.find(x => x.status = "1");
            $.LoadingOverlay("hide");
        })
        $.LoadingOverlay("hide");
    })

    $scope.setNilaiRank = ()=>{
        if($scope.jumlahRanking<0){
            $scope.jumlahRanking = 0;
        }
    }

    $scope.save = (item) => {
        message.dialogmessage("data yang telah ada akan diganti dengan data yang baru \nAnda yakin akan menyimpan hasil?", "Ya", "Tidak").then(x=>{
            seleksiServices.post(item).then(res => {
                $scope.dataSend = res;
                console.log($scope.dataSend);
                message.info("Berhasil menyimpan data!!");
            })
        })
        
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

    $scope.proses = (item)=>{
        $scope.tampil = true;
    }

    $scope.setNilai = (item)=>{
        $scope.dataKirim.data = item;
        $("#setInfo").modal("show");
    }
    $scope.send = (item)=>{
        message.dialogmessage("kirim pesan?", "Ya", "Tidak").then(x=>{
            $.LoadingOverlay("show");
            $("#setInfo").modal('hide');
            $scope.dataKirim.info = angular.copy(item);
            $scope.dataKirim.info.hari = $scope.dataKirim.info.hari.getFullYear() + "-0" + ($scope.dataKirim.info.hari.getMonth() + 1) + "-" + $scope.dataKirim.info.hari.getDate();
            console.log($scope.dataKirim);
            seleksiServices.send($scope.dataKirim).then(res=>{
                $.LoadingOverlay("hide");
                message.info("Pesan Terkirim!!!");
            })

        })
    }

    $scope.print = () => {
        $("#print").printArea();
    }
}

function historyController($scope, helperServices, seleksiServices, message, periodeServices) {
    $scope.itemHeader = { title: "History", breadcrumb: "History", header: "History" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.model = {};
    $scope.periodes = [];
    $scope.periode={};
    $scope.datas = [];
    $scope.datasHistory = [];
    $scope.a = [];
    periodeServices.get().then(res => {
        $scope.$applyAsync(x=>{
            $scope.periodes = res;
        })
        console.log(res);
        seleksiServices.hasil().then(x=>{
            $scope.datas = x;
            $.LoadingOverlay("hide");
        })
    })

    $scope.show = ()=>{
        $scope.datasHistory = $scope.datas.filter(x=>x.periodeid==$scope.periode.id);
    }

    $scope.print = () => {
        $.LoadingOverlay("show");
        $("#print").printArea();
        setTimeout(() => {
            $.LoadingOverlay("hide");
        }, 1000);
    }
}