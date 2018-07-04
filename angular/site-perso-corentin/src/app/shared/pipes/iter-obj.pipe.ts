import {Pipe, PipeTransform} from '@angular/core';

@Pipe({name: 'iterObj'})
export class IterObjPipe implements PipeTransform {
  transform(value, args: string[]): any {
    const keys = [];
    for (const key in value) {
      if (value.hasOwnProperty(key)) {
        keys.push({key: key, value: value[key]});
      }
    }
    return keys;
  }
}
