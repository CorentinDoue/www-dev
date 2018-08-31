import {Injectable} from '@angular/core';

@Injectable()
export class DateService {
  public getLastMonday(timestamp: number | null): number {
    const currentDate = timestamp === null ? new Date() : new Date(timestamp * 1000);
    const lastmonday = new Date(currentDate.setDate(currentDate.getDate() - currentDate.getDay() + 1 ));
    return Math.floor(lastmonday.getTime() / 1000);
  }

  public getNextMonday(timestamp: number): number {
    const currentDate = timestamp === null ? new Date() : new Date(timestamp * 1000);
    const lastmonday = new Date(currentDate.setDate(currentDate.getDate() - currentDate.getDay() + 8 ));
    return Math.floor(lastmonday.getTime() / 1000);
  }

  public isInWeek(timestamp: number, weekTimestamp: number): boolean {
    if ( timestamp >= this.getLastMonday(weekTimestamp) && timestamp < this.getNextMonday(weekTimestamp)) {
      return true;
    } else {
      return false;
    }
  }
}
