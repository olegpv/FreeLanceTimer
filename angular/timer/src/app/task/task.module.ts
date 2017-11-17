import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TaskListComponent } from './task-list.component';
import { TaskService } from '../model/task.service';
import { GlobalService } from '../model/global.service';

import { TaskComponent } from './task.component';
import { TimePipe } from './time.pipe';
import { DecimalPipe } from '@angular/common';


@NgModule({
  imports: [
    CommonModule,
    
  ],
  declarations: [TaskListComponent, TaskComponent, TimePipe],
  exports: [TaskListComponent],
  providers: [TaskService, GlobalService, DecimalPipe]
})
export class TaskModule { }
