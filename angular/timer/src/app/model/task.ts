export class Task {
    id: number;
    projectId: number;
    name: string;

    startTime: number;

    time: number;
    t: number;
    started: boolean;

    constructor(values: Object = {}) {
        Object.assign(this, values);
    }
}