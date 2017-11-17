import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Routes, RouterModule, ExtraOptions } from '@angular/router';

import { AppComponent } from './app.component';
import { TaskModule } from './task/task.module';
import { TaskListComponent } from './task/task-list.component';

import { TaskAdminComponent } from './task-admin/task-admin.component';
import { TaskAdminModule } from './task-admin/task-admin.module';

// определение маршрутов
const appRoutes: Routes = [
  { path: '', component: TaskListComponent },
  { path: 'admin', component: TaskAdminComponent },
  //{ path: '**', component: NotFoundComponent }
];

@NgModule({
  declarations: [
    AppComponent,

  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(appRoutes, { useHash: true }),
    HttpClientModule,
    TaskModule,
    TaskAdminModule,
  ],
  exports: [],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
