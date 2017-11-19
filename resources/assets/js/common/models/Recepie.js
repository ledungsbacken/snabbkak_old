import Model from './Model.js';

export default class Recepie extends Model {

    constructor(args = {}) {
        super({
            'id'         : args.id,
            'name'       : args.name,
            'user_id'    : args.user_id,
            'created_at' : args.created_at,
            'updated_at' : args.updated_at,
        });

        this.http.defaults.baseURL += 'recepie/';
    }

    /**
     * @return $promise
    */
    show() {
        return this.http
            .get(this.data.id.toString())
            .then(response => new Recepie(response.data));
    }

    /**
     * @return $promise
    */
    store() {
        return this.http
            .post(null, this.data)
            .then(response => new Recepie(response.data));
    }

    /**
     * @return $promise
    */
    update() {
        return this.http
            .put(this.data.id.toString, this.data)
            .then(response => new Recepie(response.data));
    }

    /**
     * @return $promise
    */
    static index(args = {}) {
        return super._createAxios('recepie')
            .get(null, {params : args})
            .then((response) => {
                response.data.data = Recepie.collect(response.data.data);
                return response.data;
            });
    }




}
