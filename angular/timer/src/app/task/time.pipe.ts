import { Pipe, PipeTransform } from '@angular/core';
import { DecimalPipe } from '@angular/common';

@Pipe({
  name: 'time'
})
export class TimePipe implements PipeTransform {
  constructor(private decimalPipe: DecimalPipe){}
  transform(value: number): string {
    
    return this.decimalPipe.transform(value/(60*60),'2.0-0')+':'+this.decimalPipe.transform((value%(60*60))/60,'2.0-0')+':'+this.decimalPipe.transform(value%60,'2.0-0');
  }

}
