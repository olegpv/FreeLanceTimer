import { Injectable } from '@angular/core';

import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable } from 'rxjs/Observable';
import { Subject } from 'rxjs/Subject';
import { of } from 'rxjs/observable/of';

import { Task } from './task';
import { GlobalService } from './global.service';

@Injectable()
export class TaskService {

  constructor(private http: HttpClient, private globalService: GlobalService) { }
  getTasks(): Observable<Task[]> {
    return this.http.get<Task[]>(this.globalService.host + 'timer/task/index')
  }
  startTask(id: number): Observable<any> {
    return this.http.post<any>(this.globalService.host + 'timer/task/start', {id: id},{});
  }  
  
  stopTask(id: number): Observable<Task> {
    return this.http.post<any>(this.globalService.host + 'timer/task/stop', {id: id},{});
  }
}
