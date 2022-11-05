import java.util.List;
import java.util.ArrayList;

public class Database {
    ArrayList<Menu> ListMenu = new ArrayList<>();
    // TODO Create List of Menu Object to Store Menu from Menu Class

    // TODO Create Method to Insert Menu to Database

    // TODO Create Method to Show Menu from Database

    // TODO Create Method to Search Menu from Database

    String insertmenu;
    String showmenu;
    String searchmenu;

    public void setInsertMenu(Menu insertmenu){
        this.ListMenu.add(insertmenu);
    }
    public void setShowMenu(String showmenu) {
        this.showmenu = showmenu;
    }
    public void setSearchMenu(String searchmenu){
        this.searchmenu = searchmenu;
    }

}
