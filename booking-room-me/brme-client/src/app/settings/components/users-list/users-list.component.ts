import {Component, EventEmitter, Input, OnInit, Output, ViewChild} from '@angular/core';
import {JsonLdPage} from '../../../core/models/json-ld.model';
import {MatSort, MatTableDataSource, Sort} from '@angular/material';
import {User} from '../../models/user.model';

@Component({
  selector: 'brme-users-list',
  templateUrl: './users-list.component.html',
  styleUrls: ['./users-list.component.scss']
})
export class UsersListComponent implements OnInit{
  @Input() entities;
  @Input() type: string;
  @Input() pages: JsonLdPage;
  @Input() totalItems: number;
  @Output() goToPage = new EventEmitter<number>();
  @Output() sortChange = new EventEmitter<Sort>();
  @Output() deleted = new EventEmitter<number>();
  @Output() selected = new EventEmitter<number>();
  @ViewChild(MatSort) sort: MatSort;
  dataSource = new MatTableDataSource(this.entities);

  displayedColumns: string[] = ['firstname', 'lastname', 'email', 'type', 'bedRoomNumber', 'role', 'put', 'delete'];


  goTo(event) {
    this.goToPage.emit(event.pageIndex + 1 );
  }

  sortEvent(event) {
    this.sortChange.emit(event);
  }

  role(role) {
    switch (role) {
      case null:
        return 'Utilisateur';

      case 'ROLE_ASSO':
        return 'Association';

      case 'ROLE_ADMIN':
        return 'Administrateur';
    }
  }

  delete(user: User) {
    if ( confirm('Vous vous apprêtez à supprimer l\'utilisateur ' + user.firstname + ' ' + user.lastname + '.\n' +
      'Continuer ?') ) {
      this.deleted.emit(user.id);
    }
  }

  select(id: number) {
    this.selected.emit(id);
  }

  ngOnInit(): void {
    this.dataSource.sort = this.sort;
    if ( window.screen.width < 1200) {
      this.displayedColumns = ['firstname', 'lastname', 'type', 'bedRoomNumber', 'role', 'put', 'delete'];
    }
  }

}

