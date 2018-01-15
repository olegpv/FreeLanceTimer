import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TaskListComponent } from './task-list.component';
import { TaskService } from '../model/task.service';
import { GlobalService } from '../model/global.service';

import { TaskComponent } from './task.component';
import { TimePipe } from './../common-my/time.pipe';
import { DecimalPipe } from '@angular/common';
import { CommonMyModule } from '../common-my/common-my.module';


@NgModule({
  imports: [
    CommonModule,
    CommonMyModule
  ],
  declarations: [TaskListComponent, TaskComponent],
  exports: [TaskListComponent],
  providers: [TaskService, GlobalService]
})
export class TaskModule { }
