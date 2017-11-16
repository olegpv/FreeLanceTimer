import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { Task } from '../model/task';
import { TaskService } from '../model/task.service';

@Component({
  selector: 'task-list',
  templateUrl: './task-list.component.html',
  styleUrls: [
    './task-list.component.css',
    "../../../node_modules/font-awesome/css/font-awesome.min.css",
    "../../../node_modules/primeng/resources/themes/omega/theme.css",
    "../../../node_modules/primeng/resources/primeng.min.css",
  ],
  encapsulation: ViewEncapsulation.None
})

  export class TaskListComponent implements OnInit {
    tasks: Task[];
    constructor(private taskService: TaskService) { }

  ngOnInit() {
      this.taskService.getTasks().subscribe(tasks => this.tasks = tasks);
    }

  }
