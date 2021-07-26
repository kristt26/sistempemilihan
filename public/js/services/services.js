angular.module('services', [])
    .factory('UserServices', UserServices)
    .factory('kriteriaServices', kriteriaServices)
    .factory('periodeServices', periodeServices)
    .factory('PelangganServices', PelangganServices)
    .factory('seleksiServices', seleksiServices)
    .factory('LaporanServices', LaporanServices)
    .factory('HomeServices', HomeServices);

function UserServices($http, $q, helperServices, message) {
    var controller = helperServices.url + 'users';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get,
        post: post,
        put: put
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller,
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    def.reject(err);
                    message.error(err);
                }
            );
        }
        return def.promise;
    }

    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: helperServices.url + 'administrator/createuser/' + param.roles,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: helperServices.url + 'administrator/updateuser/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.firstName = param.firstName;
                    data.lastName = param.lastName;
                    data.userName = param.userName;
                    data.email = param.email;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

}

function kriteriaServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + '/kriteria/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get,
        post: post,
        postSub: postSub,
        put: put,
        putSub: putSub,
        deleted: deleted,
        deletedSub: deletedSub
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + "get",
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    def.reject(err);
                    message.error(err);
                }
            );
        }
        return def.promise;
    }

    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'post',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function postSub(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'postSub',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.kriteriaid);
                if (data) {
                    data.subkriteria.push(angular.copy(res.data))
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'put' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.kode = param.kode;
                    data.nama = param.nama;
                    data.type = param.type;
                    data.bobot = param.bobot;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function putSub(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'putSub' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.kriteriaid);
                if (data) {
                    var subkriteria = data.subkriteria.find(x.id == param.id);
                    if (subkriteria) {
                        data.nama = param.nama;
                        data.bobot = param.bobot;
                        data.inisial = param.inisial;
                    }
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + 'delete/' + param.id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

    function deletedSub(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + 'deleteSub/' + param.id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.kriteriaid);
                if (data) {
                    var index = data.subkriteria.indexOf(param)
                    data.subkriteria.splice(index, 1);
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}

function periodeServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + '/periode/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get,
        post: post,
        put: put,
        deleted: deleted
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + "get",
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    // service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    def.reject(err);
                    message.error(err);
                }
            );
        }
        return def.promise;
    }

    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'post',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.status == '1');
                data.status = '0';
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'put/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                service.data.filter(x => x.status = "0");
                if (data) {
                    data.periode = param.periode;
                    data.status = param.status;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + 'delete/' + param.id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}

function PelangganServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + '/pelanggan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get,
        post: post,
        deleted: deleted
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }

    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + 'delete/' + param.id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = [];
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }
}

function seleksiServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + '/seleksi/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get,
        post: post,
        proses: proses,
        send: send,
        hasil,
        hasil
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + "get",
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    def.reject(err);
                    message.error(err);
                }
            );
        }
        return def.promise;
    }

    function proses(item) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "proses",
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'post',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function send(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: helperServices.url + '/emailing/sendemail',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function hasil() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "hasil",
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }
}

function LaporanServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + '/laporan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get
    };

    function get(item) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'get',
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err.data);
            }
        );
        return def.promise;
    }

}

function HomeServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + '/home/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get
    };

    function get(item) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'get',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err.data);
            }
        );
        return def.promise;
    }

}