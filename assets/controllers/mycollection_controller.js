import { Controller } from 'stimulus';


export default class extends Controller {
    connect() {
        console.log('mycollection');
        this.element.addEventListener('form-collection:pre-connect', this._log);
        this.element.addEventListener('form-collection:connect', this._log);
        this.element.addEventListener('form-collection:pre-add', this._log);
        this.element.addEventListener('form-collection:add', this._log);
        this.element.addEventListener('form-collection:pre-delete', this._log);
        this.element.addEventListener('form-collection:delete', this._log);
    }

    disconnect() {
        // You should always remove listeners when the controller is disconnected to avoid side effects
        this.element.removeEventListener('form-collection:pre-connect', this._log);
        this.element.removeEventListener('form-collection:connect', this._log);
        this.element.removeEventListener('form-collection:pre-add', this._log);
        this.element.removeEventListener('form-collection:add', this._log);
        this.element.removeEventListener('form-collection:pre-delete', this._log);
        this.element.removeEventListener('form-collection:delete', this._log);
    }

    _log(event) {
        console.log(event);
    }
}
