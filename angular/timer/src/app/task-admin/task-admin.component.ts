import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { TaskService } from '../model/task.service';
import { Task } from '../model/task';

@Component({
  selector: 'app-task-admin',
  templateUrl: './task-admin.component.html',
  styleUrls: ['./task-admin.component.css'],
  encapsulation: ViewEncapsulation.None
})
export class TaskAdminComponent implements OnInit {

  tasks: Task[];
  constructor(private taskService: TaskService) { }

  ngOnInit() {
    this.taskService.getTasks().subscribe(tasks => this.tasks = tasks);
  }
}
