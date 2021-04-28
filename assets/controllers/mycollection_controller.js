import { Controller } from 'stimulus';


export default class extends Controller {
    connect() {
        this.element.addEventListener('collection:pre-connect', this._log);
        this.element.addEventListener('collection:connect', this._log);
        this.element.addEventListener('collection:pre-add', this._log);
        this.element.addEventListener('collection:add', this._log);
        this.element.addEventListener('collection:pre-delete', this._log);
        this.element.addEventListener('collection:delete', this._log);
    }

    disconnect() {
        // You should always remove listeners when the controller is disconnected to avoid side effects
        this.element.removeEventListener('collection:pre-connect', this._log);
        this.element.removeEventListener('collection:connect', this._log);
        this.element.removeEventListener('collection:pre-add', this._log);
        this.element.removeEventListener('collection:add', this._log);
        this.element.removeEventListener('collection:pre-delete', this._log);
        this.element.removeEventListener('collection:delete', this._log);
    }

    _log(event) {
        console.log(event);
    }
}
