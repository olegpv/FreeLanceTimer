import { Injectable } from '@angular/core';

import { environment } from '../../environments/environment';


@Injectable()
export class GlobalService {
    public host: string;

    public setting: any = {};

    constructor() {
        this.host = 'http://timer.loc/';
        if (environment.production == true) {
        } else {
        }
    }

    loadGlobalSettingsFromSessionStorage(): void {
        // if(sessionStorage.getItem('frontend-setting') != null){
        //     this.setting = JSON.parse(sessionStorage.getItem('frontend-setting'));
        // }

    }
}