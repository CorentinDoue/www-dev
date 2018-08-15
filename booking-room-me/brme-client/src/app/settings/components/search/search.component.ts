import {Component, EventEmitter, Input, Output} from '@angular/core';

@Component({
  selector: 'brme-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.scss']
})
export class SearchComponent {
  @Input() query = '';
  @Input() searching = false;
  @Input() error = '';
  @Input() success = '';
  @Input() title = 'Rechercher';
  @Input() placeholder = 'Taper votre recherche';
  @Output() search = new EventEmitter<string>();
}
