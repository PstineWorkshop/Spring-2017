// Code example for Lecture 4
// The Floyd's algorithm for the shortest paths problem
// Xiwei Wang

public class FloydShortestPath 
{
    private static final int inf = 99999;
    
    public static void main(String[] args)
    {
        int n = 5;
        int[][] W = {
            {0, 1, inf, 1, 5},
            {9, 0, 3, 2, inf},
            {inf, inf, 0, 4, inf},
            {inf, inf, 2, 0, 3},
            {3, inf, inf, inf, 0}
            };
        
        int[][] D = new int[n][n];
        int[][] P = new int[n][n];
        
        floyd(n, W, D, P);
        
        for (int i = 0; i < n; i++)
            for (int j = 0; j < n; j++)
                if (i != j)
                {
                    String strDesc = "Shortest path from v" + (i + 1) + " to v" + (j + 1) + " (length = " + D[i][j] + "): ";
                    System.out.format("%-44s", strDesc);
                    System.out.print("v" + (i + 1) + " -> ");
                    path(P, i, j);
                    System.out.println("v" + (j + 1));
                }
    }
    
    // find the shortest paths for every pair of vertices
    public static void floyd(int n, int[][] W, int[][] D, int[][] P)
    {
        // initialize matrix P (we would like to set all entries to -1 since 0 corresponds to the index of the first vertex)
        for (int i = 0; i < n; i++)
            for (int j = 0; j < n; j++)
                P[i][j] = -1;
        
        // copy the values in matrix W to matrix D
        for (int i = 0; i < n; i++)
            for (int j = 0; j < n; j++)
                D[i][j] = W[i][j]; 
        
        // iteratively calculate the shortest paths
        for (int k = 0; k < n; k++)
        {
            printDP(D, P, k);
            
            for (int i = 0; i < n; i++)
                for (int j = 0; j < n; j++)
                    if (D[i][k] + D[k][j] < D[i][j])
                    {
                        P[i][j] = k;
                        D[i][j] = D[i][k] + D[k][j];
                    }
        }
        
        printDP(D, P, n);
    }
    
    // recursively print the shortest path from vertex q to r
    public static void path(int[][] P, int q, int r)
    {     
        if (P[q][r] != -1)
        {
            path(P, q, P[q][r]);
            System.out.print("v" + (P[q][r] + 1) + " -> ");
            path(P, P[q][r], r);
        }
    }
    
    // print matrix D and P
    public static void printDP(int[][] D, int[][] P, int k)
    {
        System.out.println("D" + k + ":");
        System.out.println("----------------------------");
        
        for (int i = 0; i < D.length; i++)
        {
            for (int j = 0; j < D.length; j++)
            {
                if (D[i][j] == inf)
                    System.out.format("%-6s", "∞");
                else
                    System.out.format("%-6d", D[i][j]);
            }
            
            System.out.println();
        }
        
        System.out.println("\nP" + k + ":");
        System.out.println("----------------------------");
        
        for (int i = 0; i < P.length; i++)
        {
            for (int j = 0; j < P.length; j++)
                System.out.format("%-6d", (P[i][j] + 1));
            
            System.out.println();
        }

        System.out.println();        
    }
}
