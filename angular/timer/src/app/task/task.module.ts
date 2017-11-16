import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TaskListComponent } from './task-list.component';
import { TaskService } from '../model/task.service';
import { GlobalService } from '../model/global.service';
import {ButtonModule} from 'primeng/primeng';
import { TaskComponent } from './task.component';

@NgModule({
  imports: [
    CommonModule,
    ButtonModule
  ],
  declarations: [TaskListComponent, TaskComponent],
  exports: [TaskListComponent],
  providers: [TaskService, GlobalService]
})
export class TaskModule { }
