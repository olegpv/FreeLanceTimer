import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { TaskAdminComponent } from './task-admin.component';
import { TaskComponent } from './task.component';
import { TaskService } from '../model/task.service';
import { GlobalService } from '../model/global.service';
import { DecimalPipe } from '@angular/common';
import { CommonMyModule } from '../common-my/common-my.module';
import { TimePipe } from './../common-my/time.pipe';

@NgModule({
  imports: [
    CommonModule,
    CommonMyModule
  ],
  declarations: [TaskAdminComponent, TaskComponent],
  providers: [TaskService, GlobalService, TimePipe]
})
export class TaskAdminModule { }
