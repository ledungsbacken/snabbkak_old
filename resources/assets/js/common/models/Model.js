export default class Model {

    constructor(args) {
        this.data = {};
        this._original = {};
        this._setAttributes(args);
        this.http = this._createAxios();
    }

    /**
     * @return axios
    */
    _createAxios() {
        return Model._createAxios();
    }

    /**
     * @return void
    */
    _setAttributes(args = {}) {
        for(let key in args) {
            if(typeof args[key] !== 'function') {
                this.data[key] = args[key];
                this._original[key] = args[key];
            }
        }
        return this;
    }

    /**
     * @return void
    */
    reset() {
        for(let key in this._original) {
            this.data[key] = this._original[key];
        }
        return this;
    }

    /**
     * @return void
    */
    static collect(arr = []) {
        let resource = [];
        for(let key in arr) {
            resource[key] = new this(arr[key]);
        }
        return resource
    }

    /**
     * @return axios
    */
    static _createAxios(url = '') {
        let http = axios.create({
            'baseURL' : 'api/' + url
        });
        return http;
    }


}
