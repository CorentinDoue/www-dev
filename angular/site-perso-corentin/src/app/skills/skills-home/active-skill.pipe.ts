import { Pipe, PipeTransform } from '@angular/core';


@Pipe({name: 'activeSkill'})
export class ActiveSkillPipe implements PipeTransform {
  transform(selectedType: string): number {
    switch (selectedType) {
      case ('languages'): { return 0; }
      case ('web'): { return 1; }
      case ('ai'): { return 2; }
      case ('graphical'): { return 3; }
      case ('other'): { return 4; }
      default: { return 0; }
    }
  }
}
